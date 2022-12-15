// Если захотите использовать как сниппет, скопируйте код внутри document.addEventListener('DOMContentLoaded', function(){}
document.addEventListener('DOMContentLoaded', function(){
    const type = document.querySelector("select[name=type_val]");
    changeFormType();
    type.addEventListener('change', changeFormType);
    
    function changeFormType(){
        const paragraphs = document.querySelectorAll("p:not(:first-child)");
        const typeValue = type.value;
        for (let p of paragraphs){
            let input = p.children.item("input");
            let name = input ? input.getAttribute('name') : "";
            p.style.display = "none";  
            if (name && name.includes(typeValue)) {
                p.style.display = "block";
            }
        }
    }
});