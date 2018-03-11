/*global $*/
$(document).ready(function() {
  // Get a reference to the get button.
  var button = $('#buttonGet');

  button.click(function() {
    button.text('Getting product...');

    searchForProducts($('#textSearch').val(), function(data) {
      button.text('Search');
      console.log(data);
      if (data.uk.ghs.products.results.length > 0) {
        $('#data').html(createResultsMarkup(data.uk.ghs.products.results));
      } else {
        $('#data').html('No products returned');
      }
    });
  });

 


function createResultsMarkup(results) {
  var resultsMarkup = "";
  $.each(results, function(index, product) {
    
    resultsMarkup = resultsMarkup + 
    "<img src=" + product.image + ">" + "" + "</img>" +
    "<h3>" + product.name + "</h2>" +
    "<h4>" + product.department + "</h4>" +
    "<h4>" + product.price + "euro" + "</h4>";
  });

  var markup = "<ul>" + resultsMarkup + "</ul>";
  return markup;
}

function searchForProducts(searchTerm, dataReturned) {
  var params = {
    query: searchTerm,
    offset: 0,
    limit: 10
  };

  $.ajax({
      url: "https://dev.tescolabs.com/grocery/products/?" + $.param(params),
      beforeSend: function(xhrObj) {
        // Request headers
        xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", "3e7ceda70cfa47d1b72c6cf5df9e0107");
      },
      type: "GET",
    })
    .done(function(data) {
      dataReturned(data);
    })
    .fail(function() {
      alert("error");
    });
};
