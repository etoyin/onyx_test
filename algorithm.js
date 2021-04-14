function gh (str){

    let letters = [];
    let stringg = str.split("");
    for (let i=0; i < stringg.length; i++){
        if(!(stringg[i] >= "0" && stringg[i] <=9)){
            letters.push(stringg[i]);
            stringg[i] = "";
        }
        
    };
    let rever = letters.reverse();
    for(let i=0; i<stringg.length; i++){
        if(stringg[i] == ""){
            stringg[i] = rever[0];
            rever.shift();
        }
    }
    let result = stringg.join("");
    //console.log('object')
    console.log(result);
    
}

gh('4zi72dua9w3');