import React, { Component } from 'react';
import "react-responsive-carousel/lib/styles/carousel.min.css";
import { Carousel } from 'react-responsive-carousel';
import './ClientPhotosSlider.scss';

class ClientPhotosSlider extends Component {

  constructor(props) {
    super(props);

    this.photosList = this.photosList.bind(this);
    this.handleModalSliderClick = this.handleModalSliderClick.bind(this);
  }

  componentDidMount() {
    this.props.fadeInSlider();
  }

  handleModalSliderClick(event) {
    if (!document.getElementById('photosSliderWrap').contains(event.target)){
      this.props.closePhotosSlider();
    }
  }

  photosList() {
    let { photos } = this.props;
    let baseUrl = window.location.origin;
    let images = [];

    photos.map((photo, i) => {
      //if ( photo.private == 1 ) {
        images = [...images, <div className="slider-photo" key={i}><img src={baseUrl + photo.url} /></div>];
      //}
    });
    return images;
  }
  
  render() { 
    let { photos } = this.props;
    let selectedItem = parseInt(this.props.selected_photo);
    
    return ( 
      <React.Fragment>
        <div
            className="modal-photos-slider show-slider" 
            id="photosSlider"
            onClick={this.handleModalSliderClick}
        >
            <div id="photosSliderWrap" className="modal-photos-slider-wrap">
                <div className="modal-content">

                    <div className="modal-body">
                      
                    <Carousel showArrows={true} useKeyboardArrows={true} selectedItem={selectedItem}>
                      { this.photosList() }
              
                    </Carousel>
                    <button
                        type="button"
                        className="close-photo-slider"
                        onClick={this.props.closePhotosSlider}
                    >
                        <i className="fas fa-times-circle"></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
      </React.Fragment>
    );
  }
}
 
export default ClientPhotosSlider;