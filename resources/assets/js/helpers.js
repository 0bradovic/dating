import axios from 'axios';

let baseUrl = window.location.origin;

export const API_URL = baseUrl + "/api/";

var auth_token = localStorage.getItem("auth_token");

// export const auth = axios({
//   url: 'http://luna.boo/api/client/object',
//   method: 'GET',
//   headers: { 
//       'Content-Type': 'application/json',
//       'Authorization': 'Bearer ' + auth_token
//   },
// });

export const auth = axios.create({
  baseURL: API_URL,
  headers: { 
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + auth_token
  },
});
