let lists=document.querySelectorAll(".list")
let list_item=document.querySelectorAll(".list-item")

 let draggeditem=null

 for(let i=0;i<list_item.length;i++)
 {
    let item=list_item[i]

    item.addEventListener("dragstart",function()
    {
       
        draggeditem=item;
        console.log("dragstart")
        setTimeout(() => {
            draggeditem.style.display="none"

        },0);

    })

    item.addEventListener("dragend",function()
    {
      
        console.log("dragend")
        setTimeout(() => {
            draggeditem.style.display="block"

        },0);


    })


    for(let j=0;j<lists.length;j++)
    {
        let list =lists[j];

        list.addEventListener("dragover",function(e)
        {
            e.preventDefault();
        })
        list.addEventListener("dragenter",function(e)
        {
            e.preventDefault();
        })
        list.addEventListener("drop",function()
        {
            this.append(draggeditem);
        })
    }


 }





