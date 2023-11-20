import ACCESS_KEY from "../config.js"
google.load("language", "1")

const form = document.querySelector('.form')
const input = document.querySelector('.input')
const imgContainer = document.querySelector('.imgContainer')
const input2 = document.querySelector('.input-2')

form.addEventListener("submit", (e) => {
    e.preventDefault()
    let value = input.value
    console.log(value)

    fetchData(value)
})

async function fetchData(value) {
    try {
        const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${value}&langRestrict=fr&maxResults=20&key=${ACCESS_KEY}`)
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
    imgContainer.textContent = '';
    console.log(data.items)

    for (let i = 0; i < data.items.length; i++) {
        const imgWrapper = document.createElement("div")
        const title = document.createElement("h3")
        const para = document.createElement("p")
        // let img = 'https://islandpress.org/sites/default/files/default_book_cover_2015.jpg'
        if (data.items[i].volumeInfo.imageLinks.thumbnail){
            var img = data.items[i].volumeInfo.imageLinks.thumbnail
        } else {
            var img = 'https://islandpress.org/sites/default/files/default_book_cover_2015.jpg'
        }
        img = img.replace('http', 'https')
        img = img.replace('zoom=1', 'zoom=0')

        title.textContent = data.items[i].volumeInfo.title
        // translate(fr, para)
        para.textContent = data.items[i].volumeInfo.description

        imgContainer.appendChild(imgWrapper)
        imgWrapper.appendChild(title)
        // imgContainer.appendChild(para)
        
        imgWrapper.style.background = `url(${img})`
        imgWrapper.style.backgroundSize = 'cover'
        imgWrapper.style.width = '35vw'
        imgWrapper.style.height = '40vw'
        imgWrapper.style.display = 'flex'
        imgWrapper.style.justifyContent = 'center'
        imgWrapper.style.alignItems = 'center'

        title.style.textTransform = 'uppercase'
        // title.style.color = 'white'
        // title.style.mixBlendMode = 'difference'
        title.style.fontFamily = 'arial'
        title.style.fontWeight = '800'
        title.style.fontSize = '1.5rem'
        title.style.background = 'white'
        title.style.padding = '10px'

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