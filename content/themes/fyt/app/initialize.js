var app = {

  init: function() {

    console.log('app.init');

    app.initEventMap();
    app.initMap('eventMap','');

    },

    //HSCROLL
hscroll: function() {
    var el = document.querySelector('.container')
    var Hscroll = require('hscroll')
    new Hscroll(el, {
      type: 'swipe'
    })
},

    initEventMap: function() {
      // on regarde si notre div est presente dans la page
      if($('#eventMap').length == 0) return;

      var address = $('#eventMap').data('address');

      var geocoder = new google.maps.Geocoder();

      geocoder.geocode( { 'address': address},

      function(results, status) {

        if (status == 'OK') {

          var gps = results[0].geometry.location;

         // On construit la google map
         var map = new google.maps.Map(
           // on lui passe l'élément du DOM où sera
           // affichée notre map
           $('#eventMap').get(0),
           // On lui passe des configurations
           {
             center: gps,
             zoom: 20
           }
         );
         var marker = new google.maps.Marker({
           map: map,
           position: gps,
         }
       );
     }
     else {

       console.log('Geocode was not successful for the following reason: ' + status);
     }
   }
 );

},





  };

$(app.init);
