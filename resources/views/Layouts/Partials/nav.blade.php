<nav class="menu">
    <img class="logo" src="{{asset('images\logo.svg')}}">

<ul>
    <li>
        <a href="{{route('home')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"/></svg>    
    </a>
    </li>

    <li>
        <a href="{{route('wishlist')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="white" stroke-linecap="round" stroke-width="2" d="M4 7h16v16H4V7Zm4 2V5c0-2.21 1.795-4 4-4h0c2.21 0 4 1.795 4 4v4"/></svg>
    </a>
    </li>
    
    <li>
        <a href="{{route('cart')}}">
            <span class="info-count">3</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" d="M5.5 21a2 2 0 1 0 4 0m3 0a2 2 0 1 0 4 0M7 7.5h15.5v.25l-.239.283A16 16 0 0 0 18.5 18.34v.16h-13v-1.88c0-2.08-.066-4.158-.386-6.212C4.56 6.852 3.337 1.5 1 1.5"/></svg>
    </a>
    </li>

    <li>
        <a href="{{route('account')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><mask id="ipSPeople0"><path fill="#fff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24 20a7 7 0 1 0 0-14a7 7 0 0 0 0 14ZM6 40.8V42h36v-1.2c0-4.48 0-6.72-.872-8.432a8 8 0 0 0-3.496-3.496C35.92 28 33.68 28 29.2 28H18.8c-4.48 0-6.72 0-8.432.872a8 8 0 0 0-3.496 3.496C6 34.08 6 36.32 6 40.8Z"/></mask><path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSPeople0)"/></svg>    
    </a>
    </li>

   
  
</ul>

</nav>