//nortonb_shop
$( document ).ready(function() {

    //load 'select'
    $.getJSON( "shoes_json_encode.php", function( data ) {
    	showStore(data);
    });

    function showStore(data){

    	data.forEach( function(s) { 
             $('#shoesShop').append('<div class="col-sm-4" data-test="working">\
                <h3>'+s[0]+'</h3>\
                <img src="images/'+s[1]+'" class="img-responsive">\
                <strong>'+s[2]+'</strong> '+ s[3]+'\
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">add to cart</button>\
                </div>');
		} );

    }

    $( "#buyShoes" ).on( "submit", function( event ) {
      event.preventDefault();
      console.log("you clicked Pay Now");

      //create a name, value array with the form data
      var formData = $('#buyShoes').serializeArray();
      console.log(formData);
      $.post("shoes_insert.php", formData, function(data) {
        $(".modal-body").html(data);
        
      });
    });
});