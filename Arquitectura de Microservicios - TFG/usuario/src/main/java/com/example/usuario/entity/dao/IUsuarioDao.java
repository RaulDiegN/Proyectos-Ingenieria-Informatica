package com.example.usuario.entity.dao;

import com.example.usuario.entity.models.Usuario;
import org.springframework.data.repository.CrudRepository;

public interface IUsuarioDao extends CrudRepository<Usuario, Long> {
}
