import React, { Component } from 'react';
import ImageUploader from 'react-images-upload';

class AddPhotos extends Component {
  constructor(props) {
    super(props);

    this.state = {
      photos: [],
      photosURLs: [],
    }

    this.onDrop = this.onDrop.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.uploadPhotos = this.uploadPhotos.bind(this);
    this.deletePhoto = this.deletePhoto.bind(this);
    this.privatePhoto = this.privatePhoto.bind(this);
  }

  privatePhoto(event) {
    let index = event.target.getAttribute("value");
    let photos = [];

    this.state.photos.map((photo, i) => {
      if ( index == i ) {
        let file = photo.file;
        let private_status;
        if ( photo.private == 0 ) {
          private_status = 1;
          event.target.classList.add("active");
        } else {
          private_status = 0;
          event.target.classList.remove("active");
        }
        let photos_obj = {
          file: file,
          private: private_status
        }
        photos.push(photos_obj);
        
      } else {
        photos.push(photo);
      }
    })

    this.setState({
      photos
    })
  }

  deletePhoto(index) {
    let photosURLs = [];
    let photos = [];

    this.state.photos.map((photo, i) => {
      if ( i != index ) {
        photos.push(photo);
      }
    })

    this.state.photosURLs.map((url, i) => {
      if ( i != index ) {
        photosURLs.push(url);
      }
    })

    this.setState({
      photos,
      photosURLs
    })
  }

  uploadPhotos(event) {
    let photos = this.state.photos;
    let files = event.target.files;
    //console.log("Upload files: ", photos);
    let photosURLs = this.state.photosURLs;

    Object.keys(files).map((key) => {
      let reader = new FileReader();
      let src = "";
      let obj = {
        file: files[key],
        private: 0
      }
      photos.push(obj);

      var context = this;

      reader.onload  = event => {
        src = event.target.result;
        photosURLs.push(src);
        context.setState({
          photosURLs
        })
      }

      reader.readAsDataURL(files[key]);
    })
    // console.log("Out reader");
    this.setState({
      photos
    })
  }

  onDrop(pictureFiles, pictureDataURLs) {

		this.setState({
      photos: pictureFiles,
      photosURLs: pictureDataURLs
    });
  }
  
  handleSubmit() {
    // let files = this.state.photos;
    // let formData = new FormData();

    // for (let i = 0; i < files.length; i++) {
    //   let file = files[i];
  
    //   formData.append('files[]', file);
    // }

    // console.log("formData", formData);

    let { photos, photosURLs } = this.state;

    console.log("Submited photos object: ", photos);
    console.log("Submited photos url: ", photosURLs);
  
  }

  render() { 
    let { photos, photosURLs } = this.state;
    //console.log("photos", photos);
    console.log("photosURLs", photosURLs);
    console.log("photosURLs Length", this.state.photosURLs.length);

    return ( 
      <React.Fragment>
        <div
          className="modal fade delete-photo"
          tabIndex="-1"
          role="dialog"
          id="addPhotos"
        >
          <div className="modal-dialog add-photos-modal" role="document">
            <div className="modal-content">
                <div className="modal-header">
                    <h5 className="modal-title">Add photos</h5>
                    <button
                        type="button"
                        className="close"
                        data-dismiss="modal"
                        aria-label="Close"
                        id="addPhotosClose"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div className="modal-body">

                  {/* <ImageUploader
                      withIcon={true}
                      buttonText='Choose images'
                      onChange={this.onDrop}
                      imgExtension={['.jpg', '.gif', '.png', '.gif']}
                      maxFileSize={5242880}
                      withPreview={true}
                  /> */}

                  <div className="upload-heading">
                    <div className="btn btn-primary" >
                        Upload
                        <input type="file" onChange={this.uploadPhotos} multiple />
                    </div>
                    <div className="upload-btn-label">Choose photos to upload</div>
                  </div>

                  <div className="upload-preview">
                    { this.state.photosURLs.length > 0 ? this.state.photosURLs.map((src, i) => {
                      let classes = this.state.photos[i].private == 1 ? "private-btn active" : "private-btn";
                      return (
                        <div key={i} className="upload-preview-item">
                          <img src={src} />
                          <div className={classes} value={i} onClick={this.privatePhoto} >Private</div>
                          <span className="remove"><i className="fas fa-times-circle" onClick={() => this.deletePhoto(i)} ></i></span>
                        </div>
                      )
                    }) : "" }
              
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
 
export default AddPhotos;