var webAuth, userLoggedIn;

$(document).ready(function() {
  webAuth = new auth0.WebAuth({
    domain: AUTH0_DOMAIN,
    clientID: AUTH0_CLIENT_ID,
    redirectUri: AUTH0_CALLBACK_URL,
    audience: `https://${AUTH0_DOMAIN}/userinfo`,
    responseType: 'code',
    scope: 'openid profile'
  });

  $('.btn-login').click(function(e) {
    e.preventDefault();
    webAuth.authorize();
  });

  $('.btn-logout').click(function(e) {
    e.preventDefault();
    window.location = '/logout';
  });

  if(!userLoggedIn){
    webAuth.authorize();
  }
});

function logout() {
  window.location = '/logout';
}
