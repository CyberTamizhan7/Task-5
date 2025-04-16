
var min_stock = 1;
var max_stock = 1000;


function KnockoutJS(){

        function product(product_id, product_name, product_category, product_price){
            const thing = this;
            this.product_id = ko.observable(product_id);
            this.product_name = ko.observable(product_name);
            this.product_category = ko.observable(product_category);
            this.product_price = ko.observable(product_price);
            this.quantity = ko.observable(0);
            this.sub_total = ko.computed(function(){
                return (parseInt(thing.quantity()) * parseInt(thing.product_price()));
            })
        }

        const self = this;
        self.products = ko.observableArray([]);
        self.cart_products = ko.observableArray([]);

        self.total = ko.computed(function(){
            let sum = 0;
            self.cart_products().forEach(function(book){
                sum += book.sub_total();
            })
            return sum;
        })

        self.add_to_cart = function(cart_product){
            if(cart_product.quantity()==0){
                alert("Cannot Add to Cart on Quantity = 0");
            }
            else if(cart_product.quantity() > max_stock || cart_product.quantity() < min_stock){
                alert("Quantity Must Be Between " + min_stock + " and " + max_stock);
            }
            else{
                const existing = self.cart_products().find(p => p.product_id() === cart_product.product_id());
                if(existing){
                    alert("Added Already!");
                }
                else{
                    self.cart_products.push(cart_product);
                }
            }
        }

        self.delete_product = function(cart_product){
            cart_product.quantity(0);
            self.cart_products.remove(cart_product);
        }

        self.search = function(){
            var search_value = document.getElementById("i_search").value;
            var search_category = document.getElementById("i_category").value;
            var xhr2 = new XMLHttpRequest();
            xhr2.open("POST", "fetch_filtered_products.php", true);
            xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr2.onload = function(){
                if(xhr2.status == 200){
                    var response = JSON.parse(xhr2.responseText);
                    console.log("Response from PHP : ", response);
                    self.products.removeAll();
                    response.forEach(function(item){
                        self.products.push(new product(item.SKU_ID, item.Name, item.Category, item.Price))
                    });
                }
                else{
                    console.log("Error receving data from PHP");
                }
            };
            xhr2.send("product_name="+encodeURIComponent(search_value)+"&product_category="+encodeURIComponent(search_category));
        }

        var data;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "fetch_products.php", true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                data = JSON.parse(xhr.responseText);
                console.log(data);
                for(let i=0;i<data.length;i++){
                    self.products.push(new product(data[i]["SKU_ID"], data[i]["Name"], data[i]["Category"], data[i]["Price"]));
                }
            }
        }

        xhr.send()

}

ko.applyBindings(new KnockoutJS());