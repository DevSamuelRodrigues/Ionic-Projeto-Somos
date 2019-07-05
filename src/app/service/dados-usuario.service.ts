import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class DadosUsuarioService {

  codUsuario = '';
  emailUsuario = '';
  statusUsuario = '';
  nivelUsuario = '';
  nomeUsuario = '';
  fotoUsuario = '';


  constructor() { }

  setCodUsuario(valor) {
    this.codUsuario = valor;
  }

  getCodUsuario() {
    return this.codUsuario;
  }

  setEmailUsuario(valor) {
    this.emailUsuario = valor;
  }

  getEmailUsuario() {
    return this.emailUsuario;
  }

  setStatusUsuario(valor) {
    this.statusUsuario = valor;
  }

  getStatusUsuario() {
    return this.statusUsuario;
  }

  setNivelUsuario(valor) {
    this.nivelUsuario = valor;
  }

  getNivelUsuario() {
    return this.nivelUsuario;
  }

  setNomeUsuario(valor) {
    this.nomeUsuario = valor;
  }

  getNomeUsuario() {
    return this.nomeUsuario;
  }

  setFotoUsuario(valor) {
    this.fotoUsuario = valor;
  }

  getFotoUsuario() {
    return this.fotoUsuario;
  }


}
