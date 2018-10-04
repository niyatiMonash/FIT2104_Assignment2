<?php
/**
 * Created by PhpStorm.
 * User: niyatisrinivasan
 * Date: 4/10/18
 * Time: 11:10 AM
 */

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="stylesheets/modern-business.css" rel="stylesheet">

        <style>
            <?php include('stylesheets/bread-crumbs.css'); ?>
        </style>
        <title>Add Properties</title>
    </head>
    <body>
        <div class="container-fluid">

            <h4>Authenticate Data</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Given Name</th>
                    <th scope="col">Family Name</th>
                    <th scope="col">uname</th>
                    <th scope="col">pword</th>
                </tr>
                </thead>
                <tr>
                    <td>Niyati</td>
                    <td>S</td>
                    <td>niyatiS</td>
                    <td>test123</td>
                </tr>

                <tr>
                    <td>Stephanie</td>
                    <td>T</td>
                    <td>stephanieT</td>
                    <td>test123</td>
                </tr>
                <tbody>

                </tbody>
            </table>

            <h4>Clients Data</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Street</th>
                    <th scope="col">Suburb</th>
                    <th scope="col">State</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> Knight</td>
                    <td> Lisa</td>
                    <td> 90 Silvia Street</td>
                    <td> Stretton</td>
                    <td> Vic</td>
                    <td> 3018</td>
                    <td> lisa.knight@gmail.com</td>
                    <td> 0489876586</td>
                </tr>
                <tr>
                    <td> Doe</td>
                    <td> John</td>
                    <td> 80 Climate Road</td>
                    <td> Taylors Lakes</td>
                    <td> Vic</td>
                    <td> 3780</td>
                    <td> john.doe@gmail.com</td>
                    <td> 0471623652</td>
                </tr>
                <tr>
                    <td> Sri</td>
                    <td> Niyati</td>
                    <td> 123 Leicester Road</td>
                    <td> Glen Waverley</td>
                    <td> Vic</td>
                    <td> 3150</td>
                    <td> niyati.srinivasan@gmail.com</td>
                    <td> 0412345678</td>
                </tr>
                <tr>
                    <td> Tran</td>
                    <td> Dorothy</td>
                    <td> 1 Horse Road</td>
                    <td> Paralowie</td>
                    <td> SA</td>
                    <td> 3192</td>
                    <td> dorothytran@gmail.com</td>
                    <td> 0429238832</td>
                </tr>
                <tr>
                    <td> Look</td>
                    <td> Tiffany</td>
                    <td> 90 Bundoora Road</td>
                    <td> Endeavour Hills </td>
                    <td> Vic</td>
                    <td> 3163</td>
                    <td> tiffany.look@rus.com.au</td>
                    <td> 0416586927</td>
                </tr>
                <tr>
                    <td> Tran</td>
                    <td> Stephanie</td>
                    <td> 73 Hennessy Way</td>
                    <td> Dandenong North</td>
                    <td> Vic</td>
                    <td> 3175</td>
                    <td> stephanieduyen.tran@gmail.com</td>
                    <td> 0421118651</td>
                </tr>
                <tr>
                    <td> Low</td>
                    <td> Michelle </td>
                    <td> 21 Strarlight Road</td>
                    <td> Glen Waverley</td>
                    <td> Vic</td>
                    <td> 3150</td>
                    <td> michelle@gmail.com</td>
                    <td> 0456792123</td>
                </tr>
                <tr>
                    <td> Snow</td>
                    <td> Mathew</td>
                    <td> 41 Vista Avenue</td>
                    <td> Dandenong North</td>
                    <td> Vic</td>
                    <td> 3175</td>
                    <td> snow_mathew@gmail.com</td>
                    <td> 0432543123</td>
                </tr>
                </tbody>
            </table>

            <h4>Feature Data</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Feature Name</th>
                </tr>
                </thead>
                <tbody>
                <tr><td>Helipad</td></tr>
                <tr><td>Tennis Court</td></tr>
                <tr><td>Swimming Pool</td></tr>
                <tr><td>Wine Cellar</td></tr>
                <tr><td>Showroom</td></tr>
                <tr><td>Parking</td></tr>
                </tbody>
            </table>

            <h4>Property Data</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Property Street</th>
                    <th scope="col">Property Suburb</th>
                    <th scope="col">Property State</th>
                    <th scope="col">Property Postal Code</th>
                    <th scope="col">Property Type</th>
                    <th scope="col">Seller Id</th>
                    <th scope="col">Listing Date</th>
                    <th scope="col">Listing Price</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Sale Price</th>
                    <th scope="col">Image Name</th>
                    <th scope="col">Property Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> 92 Handsworth Street</td>
                    <td> Mulgrave</td>
                    <td> Vic</td>
                    <td> 3172</td>
                    <td> 5</td>
                    <td> 1</td>
                    <td> 2018-10-10</td>
                    <td> 20000000.00</td>
                    <td> 2018-10-25</td>
                    <td> 18000000.00</td>
                    <td> house1.jpeg</td>
                    <td> Amazing balcony view with a refurbished patio, great for family and friends. Stunning views with Waverley Gardens Shopping centre only a few minutes away.</td>
                </tr>
                <tr>
                    <td> 123 Leicester Avenue</td>
                    <td> Glen Waverley</td>
                    <td> Vic</td>
                    <td> 3214</td>
                    <td> 5</td>
                    <td> 3</td>
                    <td> 2019-10-17</td>
                    <td> 800000.00</td>
                    <td> 2019-12-25</td>
                    <td> NULL</td>
                    <td> House2.jpeg</td>
                    <td> Inspired by the glorious chateaus of France, Chateau Ami is a sophisticated and luxurious retreat that reflects that magical merging of inspiration and architecture.</td>
                </tr>
                <tr>
                    <td> 337 Stud Roade</td>
                    <td> Wantirna South</td>
                    <td> Vic</td>
                    <td> 3140</td>
                    <td> 2</td>
                    <td> 3</td>
                    <td> 2018-10-05</td>
                    <td> 10000000.00</td>
                    <td> NULL</td>
                    <td> NULL</td>
                    <td> Apartment.jpeg</td>
                    <td> Be at the forefront of lifestyle living with a stunning collection of brand new apartments and townhouses in the heart of Knox City</td>
                </tr>
                <tr>
                    <td> 86/22 Dunn Crescent</td>
                    <td> Dandenong</td>
                    <td> Vic</td>
                    <td> 3214</td>
                    <td> 4</td>
                    <td> 2</td>
                    <td> 2018-10-10</td>
                    <td> 12000000.00</td>
                    <td> NULL</td>
                    <td> NULL</td>
                    <td> warehouse2.jpeg</td>
                    <td> Newly refreshed faced - Available to purchase with lease in place - Inside secure complex with further individual security</td>
                </tr>
                <tr>
                    <td> 73 Hennessy Way</td>
                    <td> Dandenong North</td>
                    <td> Vic</td>
                    <td> 3175</td>
                    <td> 5</td>
                    <td> 1</td>
                    <td> 2013-10-11</td>
                    <td> 700000.00</td>
                    <td> 2014-10-26</td>
                    <td> 750000.00</td>
                    <td> House3.jpeg</td>
                    <td> LJ Hooker is proud to present this fantastic opportunity for all First home buyers and astute investors looking to be nestled in a highly sought-after pocket of Dandenong.</td>
                </tr>
                <tr>
                    <td> 39 Commercial Road</td>
                    <td> Strathalbyn</td>
                    <td> SA</td>
                    <td> 5225</td>
                    <td> 3</td>
                    <td> 4</td>
                    <td> 2012-10-03</td>
                    <td> 90000.00</td>
                    <td> 2015-10-16</td>
                    <td> 89000.00</td>
                    <td> Shop.jpeg</td>
                    <td> A well presented retail opportunity that is recently refurbished, with a prominent frontage to the main road of Strathalbyn</td>
                </tr>
                <tr>
                    <td> 33 Mcintosh Street</td>
                    <td> Airport West</td>
                    <td> SA</td>
                    <td> 5278</td>
                    <td> 1</td>
                    <td> 3</td>
                    <td> 2014-10-09</td>
                    <td> 60000.00</td>
                    <td> 2018-10-30</td>
                    <td> 50000.00</td>
                    <td> factory.jpeg</td>
                    <td> This stand alone solid brick building of 465m2* is situated on a Commercial 2 zoned land allotment of 770m2*</td>
                </tr>
                <tr>
                    <td> 45-47 Graham Street</td>
                    <td> Hoppers Crossing</td>
                    <td> Vic</td>
                    <td> 3089</td>
                    <td> 4</td>
                    <td> 2</td>
                    <td> 2018-10-24</td>
                    <td> 565000.00</td>
                    <td> 2017-10-10</td>
                    <td> 600000.00</td>
                    <td> Warehouse.jpeg</td>
                    <td> This property is exceptionally located with direct access to Victoria's largest bulky goods precinct along Old Geelong Road.</td>
                </tr>
                <tr>
                    <td> 4001/8 Sutherland Street</td>
                    <td> Mulgrave</td>
                    <td> Vic</td>
                    <td> 3172</td>
                    <td> 2</td>
                    <td> 3</td>
                    <td> 2018-09-11</td>
                    <td> 890000.00</td>
                    <td> 2019-10-02</td>
                    <td> 900000.00</td>
                    <td> Apartment2.jpeg</td>
                    <td> When it comes to a big city apartment with the X-Factor</td>
                </tr>
                <tr>
                    <td> 1/6a Tower Street </td>
                    <td> Glen Waverley</td>
                    <td> Vic</td>
                    <td> 3214</td>
                    <td> 3</td>
                    <td> 4</td>
                    <td> 2018-08-08</td>
                    <td> 86000.00</td>
                    <td> 2018-10-03</td>
                    <td> 950000.00</td>
                    <td> Shop2.jpg</td>
                    <td> Quietly tucked away, this single-level home was designed for low maintenance comfort, in an ultra-convenient location that retirees, first home buyers.</td>
                </tr>
                </tbody>
            </table>

            <h4>Property Feature Data</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Property Id</th>
                    <th scope="col">Feature Id</th>
                    <th scope="col">Feature Desc</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3 Courts Available</td>
                </tr>
                </tbody>
            </table>

            <h4>Type Data</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Type Name</th>
                </tr>
                </thead>
                <tbody>
                <tr><td>Factory</td></tr>
                <tr><td>Apartment</td></tr>
                <tr><td>Shop</td></tr>
                <tr><td>Warehouse</td></tr>
                <tr><td>House</td></tr>
                </tbody>
            </table>
        </div>
    </body>
</html>

