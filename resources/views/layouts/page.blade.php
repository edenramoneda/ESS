 @extends('layouts.header')

  <style>
    body
    {
                background-image:url("{{ asset('image/Human-Resources.jpg') }}");
                background-position:center;
                background-size:cover;
                width:100%;
                height:100vh;
                overflow:hidden !important;
    }
    .overlay
        {
                width: 100%;
                height: 100vh;
                z-index:5;
                background: #11998e; /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #11998e, #38ef7d); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #11998e, #38ef7d); 
                position: absolute;
                opacity: .8;
        }
    </style>