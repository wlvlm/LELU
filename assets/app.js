import ACCESS_KEY from "../config.js"

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
        const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=search+${value}`);

        if (!response.ok) {
            throw new Error('Erreur')
        }
        const data = await response.json()
        displayBookData(data)
    } catch (error) {
        console.log('Une erreur est survenue')
    }
}

function displayBookData(data){
    imgContainer.textContent = '';
    console.log(data.items)

    for (let i = 0; i < 8; i++) {
        const imgWrapper = document.createElement("div")
        const title = document.createElement("h3")
        let img = data.items[i].volumeInfo.imageLinks.thumbnail
        // img = img.replace('zoom=1', 'zoom=0')

        title.textContent = data.items[i].volumeInfo.title

        imgContainer.appendChild(imgWrapper)
        imgWrapper.appendChild(title)
        
        imgWrapper.style.background = `url('${img}')`
        // imgWrapper.style.width = '10vw'
        imgWrapper.style.display = 'flex'
        imgWrapper.style.justifyContent = 'center'
        imgWrapper.style.alignItems = 'center'

        title.style.textTransform = 'uppercase'
        title.style.color = 'white'
        // title.style.mixBlendMode = 'difference'
        title.style.fontFamily = 'arial'
        title.style.fontWeight = '800'
        title.style.fontSize = '1.5rem'

    }
}
