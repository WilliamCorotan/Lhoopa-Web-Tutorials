function movieIndex(data){
    return (
        `
        <section id="movie-index" class="bg-success" style="
        background-image: linear-gradient(
            to bottom,
            rgba(2, 117, 216, 0.5),
            rgba(41, 43, 44, 0.5)
          ), url("https://image.tmdb.org/t/p/w500/${data.backdrop_path}");">
            <div class="container mx-auto row py-5">
                <div class="movie-poster col-lg-5  ">
                    <img class="rounded w-100" src="${'https://image.tmdb.org/t/p/w500' + data.poster_path}" alt="${data.original_title}">
                </div>
                <div class="movie-details col-lg-7">
                    <h1>${data.original_title}</h1>
                    <div class="sub-heading ">
                        <small>${data.release_date}</small>
                        <span>•</span>
                        ${data.genres.map(function(genre){
                            return (
                                `
                                    <span>${genre.name}</span>
                                `
                            ) 
                        })} 
                        <span>•</span>
                        <small>${data.runtime} mins</small>
                    </div>
                </div>
            </div>
        </section>
        `)
}

export default movieIndex