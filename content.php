setInterval(function(){window.scrollBy(0,1000)},500);
let articles=document.querySelectorAll('article');
let links=[];
articles.forEach(function(article,key){links[key]=article.querySelector('a').getAttribute('href')})
console.log(JSON.stringify(links))