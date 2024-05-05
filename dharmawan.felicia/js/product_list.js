
const showResults = d => {
	$(".productlist").html(
		d.error?d.error:
		d.result.length?listItemTemplate(d.result):
		'No Results');
}

query({type:'products_all'}).then(showResults);

$(()=>{

	$("#product-search").on("submit",function(e){
		e.preventDefault();
		let search = $(this).find("input").val();
		query({'type':'product_search',search:search}).then(showResults);

	})

$(() => {
    $("#sort-dropdown").on("change", function() {
        let sortMethod = $(this).val();
        if (sortMethod) {
            query({type: 'products_sort', sort: sortMethod}).then(showResults);
        }
    });

    // Existing filter and search code here...
});


$("[data-filter]").on("click",function(e){
	let column = $(this).data("filter");
	let value = $(this).data("value");
	query(
		value == ""? {type:'products_all'}:
		{type:'product_filter', column:column, value:value}
		).then(showResults)
})

})


