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


        .rich-text>*:not(:last-child) {
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
                <span class="header__cat">Smart Atm, For you.</span>
                <h1 class="header__title">About Us. <br> Introduction to SMART ATM.</h1>
            </section>

            <section class="text-block rich-text">
                <p>Welcome to our smart ATM system, designed to provide you with a fast, secure, and convenient banking experience. Our smart ATM system is equipped with advanced features to ensure that you have the best possible banking experience.</p>




                <h1>Features and Benefits</h1>

                <p><strong> Our smart ATM system is designed with features that provide our customers with numerous benefits, such as: The ability to deposit cash, Cardless Cash withdrawal and Easy-to-use interface and user-friendly design.</strong></p>




                <h1>Our Mission</h1>

                <p><strong>Our mission is to offer our customers an ATM system that provides fast, secure, and convenient banking services that are accessible at any time. We strive to be the preferred choice for banking solutions that meet the evolving needs of our customers</strong></p>





                <h2>Security</h2>

                <p>We take security seriously, and our smart ATM system uses advanced security measures to protect our customers' transactions. To ensure the safety of your banking transactions, we use a One-Time Password (OTP) system. This feature adds an extra layer of security to your banking transactions, making sure that your financial data and transactions are protected.</p>




                <h3>Contact Us.</h3>

                <p>If you have any questions or require assistance with our smart ATM system, our customer support team is available 24/7. Please feel free to contact us via phone at 0706002813, email at michaelamakobe@smartatm.com. Our knowledgeable and friendly staff are always ready to help you with any questions or concerns you may have.</p>
            </section>
        </div>

        <div class="article__image">
            <div class="article__image-wrapper">
                <img src="https://assets.publishing.service.gov.uk/media/62f63e80d3bf7f4c60109c7d/bank-service-quality-indicators-august-2022.jfif" alt="">
            </div>
        </div>
    </article>
</body>

</html>