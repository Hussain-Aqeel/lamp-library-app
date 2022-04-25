var data = [
  {
    'genre': 'Fiction',
    'title': 'Harry Potter and the Goblet of Fire',
    'author': 'J.K Rolling',
    'wiki': 'https://en.wikipedia.org/wiki/J._K._Rowling',
    'picture': '../assets/img/harry-potter.jpg',
  },
  {
    'genre': 'Novel',
    'title': 'Crime and Punishment',
    'author': 'Fyodor Dostoevsky',
    'wiki': 'https://en.wikipedia.org/wiki/Fyodor_Dostoevsky',
    'picture': '../assets/img/crime-and-punishment.jpg',
  },
  {
    'genre': 'Non-fiction',
    'title': 'The 48 Laws of Power',
    'author': 'Robert Greene',
    'wiki': 'https://en.wikipedia.org/wiki/Robert_Greene_(American_author)',
    'picture': '../assets/img/laws-of-power.jpg',
  },
  {
    'genre': 'Psychology',
    'title': 'Man\'s Search for Meaning',
    'author': 'Viktor E. Frankl',
    'wiki': 'https://en.wikipedia.org/wiki/Viktor_Frankl',
    'picture': '../assets/img/search-for-meaning.jpg',
  },
  {
    'genre': 'Philosophy',
    'title': 'The Republic',
    'author': 'Plato',
    'wiki': 'https://en.wikipedia.org/wiki/Plato',
    'picture': '../assets/img/republic.jpg',
  },
  {
    'genre': 'Philosophy',
    'title': 'Beyond Good and Evil: Prelude to a Philosophy of the Future',
    'author': 'Friedrich Nietzsche',
    'wiki': 'https://en.wikipedia.org/wiki/Friedrich_Nietzsche',
    'picture': '../assets/img/beyond-good-and-evil.jpg',
  },
  {
    'genre': 'Self-help',
    'title': '12 Rules for Life: An Antidote to Chaos',
    'author': 'Jordan Peterson',
    'wiki': 'https://en.wikipedia.org/wiki/Jordan_Peterson',
    'picture': '../assets/img/12-rules-for-life.jpg',
  },
  {
    'genre': 'Business',
    'title': 'Who Says Elephants Can\'t Dance',
    'author': 'Lou Gerstner',
    'wiki': 'https://en.wikipedia.org/wiki/Lou_Gerstner',
    'picture': '../assets/img/elephants-dance.jpg',
  },
  {
    'genre': 'Novel',
    'title': 'The Forty Rules of Love',
    'author': 'Elif Shafak',
    'wiki': 'https://en.wikipedia.org/wiki/Elif_Shafak',
    'picture': '../assets/img/fortyrulesoflove.jpg',
  },     
]


/*
1 - Loop Through Array & Access each value
2 - Create Table Rows & append to table
*/


var state = {
'querySet': data,

'page': 1,
'rows': 6,
'window': 5,
}

buildTable()

function pagination(querySet, page, rows) {

var trimStart = (page - 1) * rows
var trimEnd = trimStart + rows

var trimmedData = querySet.slice(trimStart, trimEnd)

var pages = Math.round(querySet.length / rows);

return {
  'querySet': trimmedData,
  'pages': pages,
}
}

function pageButtons(pages) {
var wrapper = document.getElementById('pagination-wrapper')

wrapper.innerHTML = ``
console.log('Pages:', pages)

var maxLeft = (state.page - Math.floor(state.window / 2))
var maxRight = (state.page + Math.floor(state.window / 2))

if (maxLeft < 1) {
  maxLeft = 1
  maxRight = state.window
}

if (maxRight > pages) {
  maxLeft = pages - (state.window - 1)
  
  if (maxLeft < 1){
    maxLeft = 1
  }
  maxRight = pages
}



for (var page = maxLeft; page <= maxRight; page++) {
wrapper.innerHTML += `<button value=${page} class="page btn btn-secondary mr-2">${page}</button>`
}

if (state.page != 1) {
  wrapper.innerHTML = `<button value=${1} class="page btn btn-secondary mr-2">&#171; First</button>` + wrapper.innerHTML
}

if (state.page != pages) {
  wrapper.innerHTML += `<button value=${pages} class="page btn btn-secondary mr-2">Last &#187;</button>`
}

$('.page').on('click', function() {
  $('#content').empty()

  state.page = Number($(this).val())

  buildTable()
})

}


function buildTable() {
  var cards = $('#content')
// var table = $('#table-body')

  var data = pagination(state.querySet, state.page, state.rows)
  var myList = data.querySet

for (var i in myList) {

  var card = `
            <div class="card bg-light mb-3" style="max-width: 20rem;">
              <h3 class="card-header">${myList[i].genre}</h3>
              <div class="card-body">
                <h5 class="card-title">${myList[i].title}</h5>
                <h6 class="card-subtitle text-muted">${myList[i].author}</h6>
              </div>

              <img src="${myList[i].picture}" alt="${myList[i].title}" style="height: 500px;">

              <div class="card-body mx-auto">
                <button type="button" class="btn btn-lg btn-dark">View Details</button>    
              </div>
            </div>
            `

  cards.append(card)
}

pageButtons(data.pages)

}