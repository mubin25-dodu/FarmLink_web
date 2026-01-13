let search = document.getElementById('searchbar');
search.addEventListener('keypress', function(e){
    console.log(search.value);
    if(e.key === 'Enter'){
        localStorage.setItem('search', search.value);
        window.location.href = "more_products.php";
    }
});