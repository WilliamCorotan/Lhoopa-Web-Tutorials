function hero() {
    return (
        `
        <section id="hero" class="vh-50">
            <div class="text-center p-5 text-white container">
                <h1 class="display-1">Welcome!</h1>
                <p class="display-6">Millions of movies, TV shows and people to discover. Explore now.
                </p>
                <div class="input-group mt-5">
                    <input type="text" class="form-control" placeholder="Search Movie" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-success" type="button" id="button-addon2">Search</button>
                </div>
            </div>
        </section>  
        `
    )

}

export default hero  