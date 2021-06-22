'use strict';

const e = React.createElement;
const myInit = { mode: 'no-cors' };
class BannersAdmin extends React.Component {
  constructor(props) {
    super(props);
    this.state = { banners: [], unsaved: false };
    this.handleUrl = this.handleUrl.bind(this);
    this.fileInput = React.createRef();
  }
  componentDidMount() { 
    this.loadState();
  }

  loadState() {
    
    fetch('./banners.php')
            .then(response => response.json())
            .then(result => {
              this.setState({banners: result})
            })
            .catch(e => {
                console.log(e);
            });
  }

  swapArrayLocs(index1, index2) {
    const banners = this.state.banners;
    var temp = banners[index1];
  
    banners[index1] = banners[index2];
    banners[index2] = temp;

    this.setState({ banners, unsaved: true });
  }
  bajar(index) {
    this.swapArrayLocs(index, index + 1);
  }
  subir(index) {
    this.swapArrayLocs(index, index - 1);
  }

  eliminar(index) {
    const banners = this.state.banners;
    banners.splice(index, 1);
    this.setState({ banners, unsaved: true });
  }
  handleUrl(event) {
    const banners = this.state.banners;
    const newVal = event.target.value;
    const index = event.target.getAttribute('index');

    banners[index].url = newVal;
    this.setState({ banners, unsaved: true })
  }

  guardar() {
    const self = this;
    fetch("./banners-save.php",
    {
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        method: "POST",
        body: JSON.stringify(this.state.banners)
    })
    .then(function(res){ 
      self.setState({ unsaved: false});
      alert('cambios guardados con exito');
     })
    .catch(function(res){ 
      alert('no se pudieron guardar los cambios intente otra vez') })
  }

  upload() {
    const file = this.fileInput.current.files[0];
    if(file === undefined) {
      alert('debe seleccionar primero un archivo para subir');
      return;
    }
    var data = new FormData()
    data.append('fileToUpload', file)

    fetch('./banners-upload.php', { // Your POST endpoint
      method: 'POST',
      headers: {
        // Content-Type may need to be completely **omitted**
        // or you may need something
        //"Content-Type": "You will perhaps need to define a content-type here"
      },
      body: data // This is your file object
    }).then(
      response => {
        console.log(response);
        if (!response.ok) {
          throw new Error(response.statusText);
        }
        this.loadState();
        alert('Banner creado');
      }
    ).catch(
      error => alert(error) // Handle the error response object

    );
  };
  render() {
    const banners = this.state.banners;
    const items = banners.map((banner, index) => 
      <div key={index}>
        <img src={`home-page-banners/${banner.filename}`} />
        <br />
        <input onChange={this.handleUrl} index={index} className="w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Link del banner" value={banner.url}/>
        <br />
        {index > 0 && <button onClick={() => this.subir(index)} className="h-8 px-4 m-2 text-sm text-yellow-100 transition-colors duration-150 bg-yellow-700 rounded-lg focus:shadow-outline hover:bg-yellow-800">subir</button>}
        {index < banners.length -1  && <button onClick={() => this.bajar(index)} className="h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">bajar</button>}
        <button  onClick={() => this.eliminar(index)} className="h-8 px-4 m-2 text-sm text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800">eliminar</button>
      </div>
    );
    //console.log(items);
    const container = (
      <div className="sm:container sm:mx-auto">
        <div className=" bg-gray-100 px-4 my-4">
          <label className="text-xl">
            Nuevo Banner:
            <br />
            <input type="file" ref={this.fileInput} className="w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" />
          </label>
          <button onClick={() => this.upload()} className="h-10 px-5 m-2 text-white transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Crear</button>
        </div>
        <div className="grid grid-cols-1 gap-4">
            {items}
        </div>
        { this.state.unsaved && <button onClick={() => this.guardar()} className="h-10 px-5 m-2 text-white transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Guardar cambios</button> }
      </div>
    );
    return container;
  }
}

const domContainer = document.querySelector('#banners-admin');
ReactDOM.render(e(BannersAdmin), domContainer);
