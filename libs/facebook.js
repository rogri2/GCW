window.fbAsyncInit = function() {
    FB.init({
      appId      : '140596344553990',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };
  
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk')); 
  
  
  function share() {
    FB.ui({
      method: 'share',
      href: 'https://stabcdma.000webhostapp.com/',
      hashtag: '#STABCDMA',
      quote: "Estoy jugando Super Turbo Armored Battle-Cars Duel Mini Arena"
    }, function(response){});
  }