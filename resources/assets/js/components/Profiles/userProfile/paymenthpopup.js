import React, { Component } from 'react';

class PaymentPopUp extends Component {
    
        render() {
          return (
            <div className='popup'>
              <div className='popup_inner'>
                
              <span onClick={this.props.closePopup}>&#10006;</span>
              <h1>Purchase Credits and Get Amazing Features for only $2.99*</h1>
              </div>

              
            </div>
          );
        }
      }
 
export default PaymentPopUp;