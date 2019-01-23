import React, { Component } from 'react';
import Cropper from "react-cropper";
import "cropperjs/dist/cropper.css";

class EditCoverPhoto extends Component {
  
  constructor(props) {
    super(props);

    this.state = {
      src: null,
      croppedImageUrl: ""
    };

    this.onChange = this.onChange.bind(this);
    this.crop = this.crop.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  onChange(event) {
    let file = event.target.files[0];
    console.log("Img: ", file);

    const reader = new FileReader();
    reader.onload = () => {
        this.setState({ src: reader.result });
    };
    reader.readAsDataURL(file);
    
  }

  crop() {
    // image in dataUrl
    let cropped_url = this.refs.cropper.getCroppedCanvas().toDataURL();
    this.setState({
        croppedImageUrl: cropped_url
    })
    
  }

  handleSubmit() {
    let data = {
      cover_photo: this.state.croppedImageUrl
    }
    console.log("Data for Submit: ", data);

    auth.post('client/update', data).then(res => {
        console.log("Update Cover Photo: ", res.data);
    }).catch(error => {
        console.log("Update Cover Photo error: ", error.response);
    });
  }

  render() { 
    const { croppedImageUrl, src } = this.state;
    return ( 
      <React.Fragment>
          <div
              className="modal fade"
              tabIndex="-1"
              role="dialog"
              id="editCoverPhoto"
          >
              <div className="modal-dialog" role="document">
                  <div className="modal-content">
                      <div className="modal-header">
                          <h5 className="modal-title">Update your cover photo</h5>
                          <button
                              type="button"
                              className="close"
                              data-dismiss="modal"
                              aria-label="Close"
                          >
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div className="modal-body">
                        
                      <div className="cover-upload">
                          <input type="file" onChange={this.onChange} />
                          <Cropper
                              ref="cropper"
                              src={src}
                              style={{ height: "400", width: "100%" }}
                              // Cropper.js options
                              aspectRatio={16 / 9}
                              guides={false}
                              crop={this.crop}
                          />
                          <div className="cover-preview">
                              <img src={croppedImageUrl} alt=""/>
                          </div>
                      </div>
                        
                      </div>
                      <div className="modal-footer">
                          <button
                              type="button"
                              className="btn btn-primary"
                              onClick={this.handleSubmit}
                          >
                              Submit
                              </button>
                          <button
                              type="button"
                              className="btn btn-secondary"
                              data-dismiss="modal"
                          >
                              Close
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </React.Fragment>
    );
  }
}
 
export default EditCoverPhoto;