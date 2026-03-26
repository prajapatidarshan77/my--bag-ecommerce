const allstar = document.querySelectorAll('.rating .star')
const ratingValue = document.querySelector('.rating input')

allstar.forEach((item, idx)=>{
    item.addEventListener('click', function(){
        let click = 0
        ratingValue.value = idx + 1
        console.log(ratingValue.value)
        allstar.forEach(i=>{
            i.classList.replace('bxs-star','bx-star')
            i.classList.remove('active')
        })
        for(let i=0; i<allstar.length; i++){
            if(i <= idx){
                allstar[i].classList.replace('bx-star', 'bxs-star')
                allstar[i].classList.add('active')
            }else{
                allstar[i+1].computedStyleMap.setproperty('--i',click)
                click++
            }
        }
    })
})