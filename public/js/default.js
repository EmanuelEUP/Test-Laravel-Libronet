//============================================
//MENSAJE BUENO - SUCCESS

function MsgBox(HEADER_TEXT,BODY_TEXT,COD) {

    //1 --> VERDE
    //2 --> AMARILLO
    //3 --> ROJO
    //4 --> CELESTE
     

    if (COD == 1) {

        new PNotify({
            title: HEADER_TEXT,
            text: BODY_TEXT,
            type: 'success',
            delay: 1500,
            addclass: "stack-bottomright Letra03-tipo"

        })

    }


    if (COD == 2) {


        new PNotify({
            title: HEADER_TEXT,
            text: BODY_TEXT,
            delay: 1500,
            addclass: "stack-bottomright Letra03-tipo"
        });

    }


    if (COD == 3) {

        new PNotify({
            title: HEADER_TEXT,
            text: BODY_TEXT,
            type: 'error',
            delay: 3000,
            addclass: "stack-bottomright Letra03-tipo"
        });

    }

    if (COD == 4) {


        new PNotify({
            title: HEADER_TEXT,
            text: BODY_TEXT,
            type: 'info',
            delay: 1500,
            addclass: "stack-bottomright Letra03-tipo"

        });

    }

}