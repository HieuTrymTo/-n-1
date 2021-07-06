<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="css/map.css">
    <style>
        
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php">DESIREE</a>
        </div>
        <div class="account">
            <p>Location</p>
        </div>
    </div>

    <div class="loca">
        <div id="map"></div>
        <div class="infor">
            <div class="call">
                <p>CALL US</p>
            </div>
            <div class="contact">
                <a href="">+1.866.DESIREE</a>
            </div>
            <div class="email">
                <a href="">Email Us</a>
            </div>
            <div class="find">
                <div class="da">
                    <p>OUR BRANCH</p>
                </div>
                <div class="ao">
                    <p>169.HoangMai.Street</p>
                </div>
                <div class="pi">
                    <p>77.HoBaMau.Street</p>
                </div>
                <div class="rw">
                    <p>PhuongMai.Street</p>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
        <div class="footer1">
            <h3>DESIREE</h3>
        </div>
        <div class="footer2">
            <ul>
                <li><a href="">Email Sign-Up</a></li> 
                <li><a href="">Contact Us</a></li> 
                <li><a href="">Appsp</a></li> 
                <li><a href="">Follow Us</a></li> 
                <li><a href="">Legal Notice</a></li> 
                <li><a href="">Sitemap</a></li> 
            </ul>
        </div>
    </div>


    <script>
        function initMap(){
            const uluru = { lat:20.991926752972528,lng:105.85752778843738 };
            const options = {
                zoom:14,
                center: {lat:21.0063147022918,lng:105.8466651126489 },
            }

            const map = new google.maps.Map(document.getElementById("map"), options);

            const contentString =
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
                '<div id="bodyContent">' +
                "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
                "sandstone rock formation in the southern part of the " +
                "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
                "south west of the nearest large town, Alice Springs; 450&#160;km " +
                "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
                "features of the Uluru - Kata Tjuta National Park. Uluru is " +
                "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
                "Aboriginal people of the area. It has many springs, waterholes, " +
                "rock caves and ancient paintings. Uluru is listed as a World " +
                "Heritage Site.</p>" +
                '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
                "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
                "(last visited June 22, 2009).</p>" +
                "</div>" +
                "</div>";        
            
            addMarker({
                coords:{lat:21.01368414568676, lng:105.83940855312936},
                contentString: contentString
            });
            addMarker({
                coords:{lat:21.002505452122815, lng:105.83557695312925},
                contentString: contentString
            });
            addMarker({
                coords:uluru,
                contentString: contentString
            });
            
            function addMarker(props) {
                const marker = new google.maps.Marker({
                    position: props.coords,
                    map,
                    title: "Uluru (Ayers Rock)",
                });

                if(props.iconImage) {
                    marker.setIcon(props.iconImage);
                }

                if(props.contentString) {
                    const infowindow = new google.maps.InfoWindow({
                        content: props.contentString,
                    });

                    marker.addListener("click", () => {
                        infowindow.open(map, marker);
                    });                      
                }
            }
        }
    </script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQsERSFVAiKgLFwZv5UdtAa-BsvNQ2cBY&callback=initMap&libraries=&v=weekly"
      async>
    </script>
</body>
</html>
</body>
</html>