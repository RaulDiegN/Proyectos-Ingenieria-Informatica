package com.example.usuario.entity.services;


import com.example.usuario.entity.dao.IUsuarioDao;
import com.example.usuario.entity.models.Usuario;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class UsuarioServiceImpl implements IUsuarioService{

    @Autowired
    private IUsuarioDao usuarioDao;

    @Override
    public Optional<Usuario> get(long id_user) {
        return usuarioDao.findById(id_user);
    }

    @Override
    public List<Usuario> getAll() {
        return (List<Usuario>) usuarioDao.findAll();
    }

    @Override
    public void post(Usuario usuario) {
        usuarioDao.save(usuario);
    }

    @Override
    public void put(Usuario usuario, long id_user) {
        usuarioDao.findById(id_user).ifPresent((x)->{
            usuario.setId_user(id_user);
            usuarioDao.save(usuario);
        });
    }

    @Override
    public void delete(long id_user) {
        usuarioDao.deleteById(id_user);
    }
}
