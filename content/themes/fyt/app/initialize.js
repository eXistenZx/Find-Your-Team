var app = {

  init: function() {
    console.log('app.init');

    $('.post-categories > li').addClass('cat-item');
    $('.cat-item > a').addClass('cat-link-item');
    $('.btn-chat').on('click', app.sendMessage);
    app.getMessage();
  },



sendMessage: function(event){
    // we prevent the button from sending the form
    event.preventDefault();

    var user_login = $('#user_login').val(); // we secure the data
    var content = $('#content').val();
    var created_at =  $('#date').val();

    //we check that the variables are not empty
    if(user_login != "" && content != "" && created_at != ""){

        $.ajax({
          // we give the URL of the treatment file
          url : "../Find.your.Team/content/themes/fyt/messagerie/",
          type : "POST", // the request is type of POST
          data : "add_chat_message=1&content=" + content, // send the data
          success: function(json) {

            app.getMessage();
            var content = $('#content').val('');
          },
          error: function(error) {
            console.log('error', error);
          }
        });
  }
  return false;
},

getMessage: function(){
  // // on récupère l'id le plus récent
  var premierID = $('.messages .display div p:first').attr('id');

  console.log(premierID);

        $.ajax({
            url : "../Find.your.Team/content/themes/fyt/messagerie/", // on passe l'id le plus récent au fichier de chargement
            type : "POST",
            data: "get_chat_message=1&id="+premierID,
            success : function(html){
                // on veut ajouter les nouveaux messages au début du bloc #messages
                $('.messages .display div').prepend(html);
              }
            });
            setInterval(function() {app.getMessage},1000);
   },
};
$(app.init);
