<?php

function component($productname,$productdesc, $productprice, $productimg, $productid, $returnLink){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"$returnLink\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <p class=\"card-text\">
                               $productdesc
                            </p>
                            <h5>
                                <span class=\"price\">PHP $productprice</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}


function featured($productname,$productdesc, $productprice, $productimg, $productid){
    $element = "
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
    <form action=\"products.php\" method=\"post\">
        <div class=\"card shadow\">
            <div>
                <img src=\"$productimg\" alt=\"Image\" class=\"img-fluid card-img-top\">
            </div>
            <div class=\"card-body\">
                <h5 class=\"card-title\">$productname</h5>
                <p class=\"card-text\">
                   $productdesc
                </p>
                <h5>
                    <span class=\"price\">PHP $productprice</span>
                </h5>
           <input type='hidden' name='id' value='$productid'>
            </div>
        </div>
    </form>
</div>
    ";
    echo $element;
}
function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"../views/cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\"></small>
                                <h5 class=\"pt-2\">PHP $productprice</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

















