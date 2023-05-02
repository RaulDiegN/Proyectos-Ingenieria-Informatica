package com.example.usuario.entity.services;

import com.example.usuario.entity.models.Usuario;

import java.util.List;
import java.util.Optional;

public interface IUsuarioService {

    public Optional<Usuario> get(long id_user);
    public List<Usuario> getAll();
    public void post(Usuario usuario);
    public void put(Usuario usuario, long id_user);
    public  void delete(long id_user);
}
