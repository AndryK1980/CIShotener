$(document).ready(function(){
    $('#btn-shorten').on('click', sendUrl);
});
var API_URL = 'http://localhost:8035/CIShotener/index.php/short/insert'
var sendUrl = function(){
    var url = $('#url-field').val();
    var userUrlCode=$('#short-url-field').val();
    var shotUrlInput=$('#short-url-link');
    var validErr=$('#massege-err');
    $.ajax({
        url: API_URL/* + '/urls'*/,
        method: 'POST',
        dataType: 'json',
        responseType:'json',
        data: {url: url,userUrlCode:userUrlCode},
        success: function(mydata){
           shotUrlInput.attr('href',mydata.myVar);
           shotUrlInput.text(mydata.myVar);
        },
        error: function(mydata, status, error,xhr) {
            console.log(mydata.statusText);
            validErr.text(mydata.statusText);
            modalErr();
          }

    })
};
 
var modalErr=function () {
        $("#myModalErr").modal('show');
};