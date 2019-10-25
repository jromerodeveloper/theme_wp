;
((d,c,$)=>{
    c('Hello Contact Page Admin WordPress')
    c(contact_form)

    d.addEventListener('click',e=>{
        if(e.target.matches('.u-delete')){
            e.preventDefault()
            // c(e.target.dataset.contactId)

            let id = e.target.dataset.contactId,
             confirmDelete = confirm(`¿Estás seguro de eliminar el comentario con el ID ${id}?`)
            
            if(confirmDelete){
                $.ajax({
                    type:'post',
                    data:{
                        'id':id,
                        'action':'themeWP_contact_form_delete'
                    },
                    url:contact_form.ajax_url,
                    success:data=>{
                        c(data)
                    }
                });
            }else{
                return false;
            }
        
        }
        // console.log(e.target)

    })
})(document,console.log,jQuery.noConflict());