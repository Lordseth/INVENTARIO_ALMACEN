function iniciarApp(){buscarServicio()}function buscarServicio(){let e=[],n=[];document.querySelector("#servicio").addEventListener("input",(function(i){const t=i.target.value;if(t.lenght>3){const i=new RegExp(t,"i");n=e.filter(e=>{if(-1!=e.nombre.toLowerCase(i))return e}),console.log(n)}}))}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));