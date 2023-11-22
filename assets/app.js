import ACCESS_KEY from "../config.js"
google.load("language", "1")
const form = document.querySelector('.form')
const input = document.querySelector('.search')

form.addEventListener("submit", (e) => {
    e.preventDefault()
    let value = input.value
    console.log(value)

    fetchData(value)
})

async function fetchData(value) {
    try {
        const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${value}&orderBy=relevance&maxResults=20&key=${ACCESS_KEY}`)
        // const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${value}&callback=handleResponse`)

        if (!response.ok) {
            throw new Error('Erreur')
        }
        const data = await response.json()
        displayBookData(data)
    } catch (error) {
        console.log(error)
    }
}

function handleResponse(response) {
    for (var i = 0; i < response.items.length; i++) {
      var item = response.items[i];
      // in production code, item.text should have the HTML entities escaped.
      imgContainer += "<br>" + item.volumeInfo.title;
    }
  }

function displayBookData(data){
    const container = document.querySelector('.container')
    // container.textContent = '';
    console.log(data.items)

    for (let i = 0; i < data.items.length; i++) {
        const book = data.items[i];
        const card = document.createElement('div')
        const wrapper = document.createElement('div')
        const wrapper2 = document.createElement('div')
        const title = document.createElement('h2')
        const author = document.createElement('h4')
        const isbn = document.createElement('h4')
        const rating = document.createElement('div')
        const cover = document.createElement('img')

        wrapper.classList.add('leftSide')
        wrapper2.classList.add('rightSide')       
        card.classList.add('card')
        title.classList.add('title')
        author.classList.add('bookAuthor')
        isbn.classList.add('isbn')

        title.setAttribute('data-title', book.volumeInfo.title.substring(0, 50))

        title.textContent = book.volumeInfo.title.substring(0, 50)
        author.textContent = 'Auteur(s) : ' + book.volumeInfo.authors
        isbn.textContent = 'isbn : ' + book.volumeInfo.industryIdentifiers[1].identifier
        cover.src = book.volumeInfo.imageLinks.thumbnail != 'undefined' ? book.volumeInfo.imageLinks.thumbnail : 'https://islandpress.org/sites/default/files/default_book_cover_2015.jpg'
        // img = img.replace('http', 'https')
        // img = img.replace('zoom=1', 'zoom=0')

        card.appendChild(wrapper)
        card.appendChild(wrapper2)
        wrapper.appendChild(title)
        wrapper.appendChild(isbn)
        wrapper.appendChild(author)
        wrapper.appendChild(rating)
        wrapper.appendChild(cover)
        container.appendChild(card)

    }
}

window.addEventListener('load', (e) => {
    fetchData('Hunger Games')
})

// Responsive du body et de la Nav

let body = document.querySelector('body')
let navWidth = document.querySelector('nav').clientWidth + 20 + 'px'
let navHeight = document.querySelector('nav').clientHeight + 20 + 'px'

if (window.innerWidth > 768){
    body.style.paddingLeft = navWidth
    body.style.paddingBottom = '0'
} else {
    navHeight = document.querySelector('nav').clientHeight + 20 + 'px'
    body.style.paddingLeft = '0'
    body.style.paddingBottom = navHeight
}

window.addEventListener('resize', (e) =>{
    body.style.paddingLeft = navWidth
    if (window.innerWidth < 768){
        navHeight = document.querySelector('nav').clientHeight + 20 + 'px'
        body.style.paddingLeft = '0'
        body.style.paddingBottom = navHeight
    } else {
        navWidth = document.querySelector('nav').clientWidth + 20 + 'px'
        body.style.paddingLeft = navWidth
        body.style.paddingBottom = '0'
    }
})

function translate(lang, text) {
    let org = 'en'
    if (lang != org) {
        google.language.translate(text, org, lang, function(result) {
			if (!result.error) {
				text.innerHTML = result.translation
			}
		})
	}
}