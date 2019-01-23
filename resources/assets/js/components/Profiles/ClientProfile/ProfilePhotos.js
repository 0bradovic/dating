import React, { Component } from 'react';
import ItemsCarousel from 'react-items-carousel';
import ClientPhotosSlider from './modals/ClientPhotosSlider/ClientPhotosSlider';
import DeletePhoto from "./modals/EditProfile/DeletePhoto";
import AddPhotos from "./modals/EditProfile/AddPhotos";

class ProfilePhotos extends Component {
  constructor(props) {
    super(props);

    this.state = {
      activeItemIndex: 0,
      private_photos: false,
      openPhotos: false,
      selected_photo: 0,
      deleted_photo_id: null
    }

    this.photosList = this.photosList.bind(this);
    this.changeActiveItem = this.changeActiveItem.bind(this);
    this.openPhotos = this.openPhotos.bind(this);
    this.closePhotosSlider = this.closePhotosSlider.bind(this);
    this.fadeInSlider = this.fadeInSlider.bind(this);
    this.deletePhoto = this.deletePhoto.bind(this);
    this.handleProfileDataType = this.handleProfileDataType.bind(this);
    this.addPhotos = this.addPhotos.bind(this);
  } 

  changeActiveItem(activeItemIndex) {
    this.setState({ activeItemIndex });
  }

  openPhotos(event) {
    event.preventDefault();
    let selected_photo = event.target.getAttribute("value");
    this.setState({
      openPhotos: true,
      selected_photo
    })
    //document.getElementsByClassName("modal-photos-slider-wrap")[0].classList.add("fade-slider");
  }

  closePhotosSlider() {
    document.getElementsByClassName("modal-photos-slider-wrap")[0].classList.remove("fade-slider");
    setTimeout(() => { 
      this.setState({
        openPhotos: false
      })
    }, 500);
    
  }

  fadeInSlider() {
    document.getElementsByClassName("modal-photos-slider-wrap")[0].classList.add("fade-slider");
  }

  deletePhoto(event) {
    let deleted_photo_id = event.target.getAttribute("value");
    this.setState({
      deleted_photo_id
    })
  }

  photosList() {
    let clientPhotosTitle = "";
    let go_to_photos = ""; 
    let switch_photos_arg = "";
    let { photos } = this.props; //niz objekata
    let imagesUrl = []; //niz img url
    let baseUrl = window.location.origin;
    let images = [];
    let photos_slider = [];
    let selected_photo = 0;

    const { activeItemIndex } = this.state;

    let { profile_data_type } = this.props;
    console.log("profile_data_type", profile_data_type);
    
    switch(profile_data_type) {
      case "profile_photos":
        clientPhotosTitle = "My Photos";
        go_to_photos = "My private photos";
        switch_photos_arg = "profile_private_photos";
        selected_photo = 0;
        photos.map((photo, i) => {
          if ( photo.private == 0 ) {
            images = [...images, 
              <div className="client-photos-carousel" key={i}>
                <img src={baseUrl + photo.url} onClick={this.openPhotos} value={selected_photo} />
                <span className="remove-photo" data-toggle="modal" data-target="#deletePhoto" ><i className="fas fa-times-circle" value={photo.id} onClick={this.deletePhoto}></i></span>
              </div>
            ];
            selected_photo++;
          }
        });
        photos_slider = photos.filter(photo => photo.private == 0);
        break;
      case "profile_private_photos":
        clientPhotosTitle = "My Private Photos";
        go_to_photos = "My photos";
        switch_photos_arg = "profile_photos";
        selected_photo = 0;
        photos.map((photo, i) => {
          if ( photo.private == 1 ) {
            images = [...images, 
              <div className="client-photos-carousel" key={i}>
                <img src={baseUrl + photo.url} onClick={this.openPhotos} value={selected_photo} />
                <span className="remove-photo" data-toggle="modal" data-target="#deletePhoto"><i className="fas fa-times-circle" value={photo.id} onClick={this.deletePhoto}></i></span>
              </div>];
            selected_photo++;
          }
        });
        photos_slider = photos.filter(photo => photo.private == 1)
        break;
    }

    if (this.state.private_photos) {
      photos.filter(photo => photo.private == 0)
    } else {
      photos.filter(photo => photo.private == 1)
    }

    

    return (
      <React.Fragment>
        <div className="photos-heading">
          <h4 className="client-photos-title">{clientPhotosTitle}</h4>
          <div>
            <button className="add-photos" data-toggle="modal" data-target="#addPhotos" onClick={this.addPhotos}>Add new photos</button>
            <button onClick={() => this.handleProfileDataType("profile_info")}>My profile info</button>
            <button onClick={() => this.handleProfileDataType(switch_photos_arg)}>{go_to_photos}</button>
          </div>
        </div>
        <div className="photos-carousel">
          <ItemsCarousel
            // Placeholder configurations
            enablePlaceholder
            numberOfPlaceholderItems={5}
            minimumPlaceholderTime={1000}
            //placeholderItem={<div style={{ height: 200, background: '#900' }}>Placeholder</div>}
    
            // Carousel configurations
            numberOfCards={4}
            gutter={5}
            showSlither={true}
            firstAndLastGutter={false}
            freeScrolling={false}
    
            // Active item configurations
            requestToChangeActive={this.changeActiveItem}
            activeItemIndex={activeItemIndex}
            activePosition={'center'}
    
            chevronWidth={24}
            rightChevron={<i className="fas fa-angle-right profile-photos-carousel"></i>}
            leftChevron={<i className="fas fa-angle-left profile-photos-carousel"></i>}
            outsideChevron={true}
          >
            {images}
          </ItemsCarousel>
        </div>
        

        { this.state.openPhotos ? <ClientPhotosSlider fadeInSlider={this.fadeInSlider} closePhotosSlider={this.closePhotosSlider} photos={photos_slider} selected_photo={this.state.selected_photo} /> : "" }

      </React.Fragment>
    );

  }

  handleProfileDataType(data_type) {
    this.props.handleProfileDataType(data_type);
  }

  addPhotos() {

  }

  render() { 
    return ( 
      <React.Fragment>
        {this.photosList()}

        <DeletePhoto user={this.props.user} deletePhotoId={this.state.deleted_photo_id} />
        <AddPhotos />
      </React.Fragment>
    );
  }
}
 
export default ProfilePhotos;