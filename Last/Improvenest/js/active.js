const store='LINK_ACTIVATED_MEMORY';
const cn='active';
const links=document.querySelectorAll('.sidenav > a.normal');
const makeActive=(e)=>{
    e.preventDefault();
    links.forEach(a=>a.classList.remove(cn));
    localStorage.setItem( store, e.target.href );
    location.href=e.target.href;
};
const loadActive=()=>{
    let stored=localStorage.getItem( store );
    if( stored==null )return;
    Array.from( links ).some(a=>{
		if( stored==a.href ){
			a.classList.add(cn)
			return true;
		}
    });
};
links.forEach(a=>a.addEventListener('click',makeActive));
loadActive();