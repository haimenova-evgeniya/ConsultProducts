$(document).ready(function(){
	$('input[name="button-add-product"]').on('click', getProductValue);
});

/*
 * Function that get value from form
**/
function getProductValue (e) {
	e.preventDefault();
	var m_barcode = $('input[name="barcode"]').val(),
		m_name = $('input[name="name-product"]').val(),
		m_description = $('input[name="description"').val(),
		m_category = $('input[name="category"').val(),
		m_purchasePrice = $('input[name="purchase-price"]').val(),
		m_retailPrice = $('input[name="retail-price"]').val(),
		m_number = $('input[name="amount"]').val();   

	$.post( 
		"ajax/add_product.php", 
		{ 
			type: 'add_product',
			barcode: m_barcode,
			name: m_name,
			description: m_description,
			category: m_category,
			purchasePrice: m_purchasePrice,
			retailPrice: m_retailPrice,
			amount: m_number,
		}
	)
    .done(function( data ) {
     	console.log( data );
     	if (data) {
 			$('#list-product tbody').after("<tr>" +
			  "<td>" + m_barcode + "</td>" +
              "<td>" + m_name + "</td>" +
              "<td>" + m_description + "</td>" +
              "<td>" + m_category + "</td>" +
              "<td>" + m_purchasePrice + "</td>" +
              "<td>" + m_retailPrice + "</td>" +
              "<td>" + m_number + "</td></tr>"
			);
			$('#add-form input[type="text"]').val('');
     	}
     	else {
     		alert("Не все поля заполнены или введен неправильный формат данных");
     	}
 	});
}






