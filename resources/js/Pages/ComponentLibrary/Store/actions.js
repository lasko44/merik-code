export default {
    updatePath(path, fileName){
        this.pathArr = path
        this.path = buildPath(path, fileName);
    },
}

function buildPath(path, fileName){
    let pathString = "";

    if(path.length && fileName){
        for (let index in path){
            pathString = pathString + path[index];
        }
        pathString = pathString + fileName;
    }

    return pathString
}