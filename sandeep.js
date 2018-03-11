/* global $*/
function getResult(userInput) {
	var storedSearchItem;
	$('.resultContainer').html('');
	$.ajax({
		type: 'GET',
		async: false,
		url: 'https://dev.tescolabs.com/grocery/products/?query=' + userInput + '&offset=0&limit=10',
		beforeSend: function(xhrObj){
                // Request headers
                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key","d96710cb544d4422b7fe71af1c3d7872");
            },
		success: function(d) {
			storedSearchItem = d.uk.ghs.products.results;
		}
	});

	storedSearchItem.map(function(item) {
		var x = item.fields
		$('.resultContainer').append(
			'<div class="itemBar">'+
				'<h2>' + x.superDepartment + '<h2>' +
			'</div>'
			);
	});
}

function searchValue() {
	var formVal = document.getElementById('searchBar').value;
	getResult(formVal);
}

$('#searchForm').submit(function(e) {
	e.preventDefault();
});

