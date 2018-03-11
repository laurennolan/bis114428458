/*global $*/
var Basket = {
  lineItems: [],
  getBasketTotal: function() {
    var total = 0;
    $.each(Basket.lineItems, function(key, item) {
      total = total + item.price;
    });

    // Round total to two decimals.
    total = parseFloat(Math.round(total * 100) / 100).toFixed(2);
    return total;
  },
  add: function(tpnb, price) {
    this.lineItems.push({
      tpnb: tpnb,
      price: price
    });
    this.onBasketAdd();
    console.log(this.lineItems);
  },
  onBasketAdd: function() {
  // Not implemented
  }
}

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

  var basket = $('#basket');
  Basket.onBasketAdd = function() {
    var basketMarkup = "";
    $.each(Basket.lineItems, function(key, item) {
      basketMarkup = basketMarkup + "<li>" + item.tpnb + " £" + item.price + "</li>"
    })


    var markup = "<ul>" + basketMarkup + "</ul>" + "<h2>Total: £" + Basket.getBasketTotal() + "</h2>";
    basket.html(markup);
  }
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
