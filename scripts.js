var hide=false;
var a;
function toggle(a){
    if(a==1){
    if(hide){
        document.getElementById("password").setAttribute("type","password");
        hide=false;
    }
    else{
        document.getElementById("password").setAttribute("type","text");
        hide=true;
    }
    }
    if(a==2){
    if(hide){
        document.getElementById("bpassword").setAttribute("type","password");
        hide=false;
    }
        else{
        document.getElementById("bpassword").setAttribute("type","text");
        hide=true;
    }
    }
    if(a==3){
        if(hide){
        document.getElementById("cpassword").setAttribute("type","password");
         hide=false;
        }
        else{
        document.getElementById("cpassword").setAttribute("type","text");
        hide=true;
    }
    }
}


        function setuptabs(){
            document.querySelectorAll(".nav-tabs").forEach(button =>{
                button.addEventListener("click",()=>{
                    const sidebar = button.parentElement;
                    const tabcontainer = sidebar.parentElement;
                    const tabNumber = button.dataset.forTab;
                    const tabtoactivate = tabcontainer.querySelector(`.alltabs[data-tab="${tabNumber}"]`);
                    console.log(tabNumber);
                    sidebar.querySelectorAll(".nav-tabs").forEach(button=>{
                        button.classList.remove("nav-tabs--active"); 
                     });
                   
                    tabcontainer.querySelectorAll(".alltabs").forEach(tab=>{
                       tab.classList.remove("alltabs--active"); 
                    });

                    button.classList.add("nav-tabs--active");
                    tabtoactivate.classList.add("alltabs--active");
                });
            });
        }

        document.addEventListener("DOMalltabsLoaded",()=>{
            setuptabs();
            document.querySelectorAll(".tabs").forEach(tabcontainer=>{
                tabcontainer.querySelector(".sidebar .nav-tabs").click();
            });
        });
        document.querySelector("#nav .user-pic").addEventListener("click",()=>{
            document.getElementById("subMenu").style ="400px";
        })
