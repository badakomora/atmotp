<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Prata&display=swap');

:root {
  --f-headline: 'Prata', serif;
  --f-body: 'Open Sans', sans-serif;

  --c-primary: #e24630;
  --c-darkest: #4c4f55;
  --c-lightest: #ffffff;
}

* {
    padding: 0;
    margin: 0;
    border: 0;
    box-sizing: border-box;
}

html {
    font-size: 62.5%;
}

body {
    font-size: 1.6rem;
    line-height: 1.625;
    font-family: var(--f-body);
    color: var(--c-darkest);
}

/* WYWIWG Styles */

.rich-text p {
    font-size: 1.6rem;
}

.rich-text a {
    color: var(--c-primary);
}

.rich-text h1,
.rich-text h2,
.rich-text h3,
.rich-text h4 {
    font-family: var(--f-headline);
    padding-top: 4rem
}

.rich-text h1 {
    font-size: 3.6rem;
}

.rich-text h2 {
    font-size: 2.8rem;
}

.rich-text h3 {
    padding-top: 2rem;
    font-size: 2.2rem;
}

.rich-text li:not(:last-child) {
    margin-bottom: 1.2rem;
}

.rich-text ul li {
    position: relative;
    display: block;
    padding-left: 1.8rem;
}

.rich-text ul li:after {
    content: '';
    display: block;
    height: .6rem;
    width: .6rem;
    position: absolute;
    top: .9rem;
    left: 0;
    border-radius: 100%;
    background-color: var(--c-primary);
}


.rich-text > *:not(:last-child) {
    margin-bottom: 4rem;
}

.article {
  display: flex;
  align-items: flex-start;
  min-height: 100vh;
}

.article__body {
  width: 50%;
  padding: 20vh 5%;
  max-width: 70rem;
  margin-left: auto;
  margin-right: auto;
}

.article__image {
  position: sticky;
  top: 0;
  width: 50%;
}

.article__image-wrapper {
    position: relative;
    min-height: 100vh;
}

.article__image-wrapper img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.header {
    margin-bottom: 20rem;
}

.header__cat {
    display: block;
    text-transform: uppercase;
    font-size: 1.1rem;
    margin-bottom: 3rem;
    letter-spacing: 0.1rem;
    font-family: var(--f-body);
    font-weight: bold;
    opacity: .6;
}

.header__title {
    font-size: 4.2rem;
    font-family: var(--f-headline);
    color: var(--c-primary);
    line-height: 1.15;
}

.article__end {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 33vh;
    background-color: var(--c-primary);
    text-decoration: none;
}

.article__end-text {
    font-size: 2.8rem;
    font-family: var(--f-headline);
    color: var(--c-lightest);
}

    </style>
</head>
<body>
    <article class="article">
        <div class="article__body">
            <section class="header">
                <span class="header__cat">AI & Automation</span>
                <h1 class="header__title">Lorem ipsum dolor sit amet consectetur.</h1>
            </section>
    
            <section class="text-block rich-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis minus perferendis magnam dignissimos ipsa aut facere, laboriosam voluptatem natus illo deserunt doloremque eligendi temporibus ea alias est beatae! Ex praesentium ad vel consequatur eveniet illum iusto enim reprehenderit assumenda molestias ipsa quis, corporis soluta adipisci nihil.</p>
    
                <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h1>
    
                <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
    
                <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum expedita recusandae aliquam.</h2>
    
                <ol>
                    <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                    <li>Aliquam tincidunt mauris eu risus.</li>
                </ol>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p>
    
                <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h3>
    
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                    <li>Aliquam tincidunt mauris eu risus.</li>
                </ul>
    
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida.</p>
            </section>
        </div>
    
        <div class="article__image">
            <div class="article__image-wrapper">
                <img src="https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80" alt="">
            </div>
        </div>
    </article>
    <a href="#" class="article__end">
        <p class="article__end-text">Next article</p>
    </a>
</body>
</html>