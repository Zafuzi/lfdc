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

  if (!userLoggedIn) {
    webAuth.authorize();
  }

  $('.selector').on('change', e => {
    let option = $('.selector option:selected');
    let client = clients[option.val()];
    $('.times_table').html(table_header);

    if(option.val() != ''){
      let times = client.times;
      for(let time in times){
        time = times[time]
        let date = table_col(time.date);
        let sign_in = table_col(time.sign_in);
        let sign_out = table_col(time.sign_out);
        let total = table_col(calculate(time.sign_in, time.sign_out));

        let row = table_row([date, sign_in, sign_out, total]);
        $('.times_table').append(row);
      }
    }
  })
});

function table_row(data){
  let row = $('<div class="row">');
  for(let col in data){
    row.append(data[col]);
  }
  return row;
}
function table_col(data) {
  return $('<span class="col">').text(data);
}

function calculate(time1, time2) {
  time1_hours = parseFloat(time1.split(':')[0]);
  time2_hours = parseFloat(time2.split(':')[0]);
  var hours = time2_hours - time1_hours;
  if (hours < 0) hours = 24 + hours;

  time1_minutes =  60 - parseFloat((time1.split(':')[1]));
  time2_minutes =  parseFloat((time2.split(':')[1]));
  var minutes = (time1_minutes + time2_minutes);
  if(minutes > 60) minutes = minutes - 60;
  if(minutes == 60){
    minutes = 0;
    hours += 1;
  }
  if(minutes < 10){
    minutes = "0" + minutes;
  }
  return hours + ":" + minutes;
}

function table_header(){
  let row = $('<div class="row header">');
  row.append(table_col("Date"), table_col("Sign In"), table_col("Sign Out"), table_col("Total (hrs:min)"));
  return row;
}

function logout() {
  window.location = '/logout';
}

function toggle(id, el, toggle_value){
  $('.modal_bg').fadeToggle(200);
  $(id).fadeToggle(300);
  let temp_val = $(el).val();
  $(el).val((temp_val == 'Close') ? toggle_value : 'Close');
}
