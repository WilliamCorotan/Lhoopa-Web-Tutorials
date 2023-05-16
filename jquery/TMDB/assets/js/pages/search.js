import card from "../components/card"

function search(data){
    let searchResults;

    if(data.results.length){
        console.log('me true')
        searchResults = data.results.map((el) => {
            return (
                `
                <div class="col-md-3 ">
                ${card(el)}
                </div>
                
                `) 
            }).join('')
        }
        else{
        console.log('false me')
        searchResults = "<h1 class='display-1'> No Movie Found! </h1>"
    }

    console.log(data)
    return(
    `
        <section class="container mx-auto my-4">
            <h3>Search Results</h3>
            <div class="w-100 mx-auto row g-2">
            ${searchResults}
            </div>
        </section>
    `)
}

export default search