DROP DATABASE IF EXISTS udecbd;
CREATE DATABASE udecbd;
USE udecbd;



CREATE TABLE estudiante (
  id_estudiante INT PRIMARY KEY AUTO_INCREMENT,
  nom_est VARCHAR(100) NOT NULL,
  ape_est VARCHAR(100) NOT NULL,
  tdo_est VARCHAR(50) NOT NULL,         -- Tipo de documento
  ndo_est VARCHAR(25) NOT NULL,         -- Número de documento
  tel_est VARCHAR(20),                  -- Teléfono
  fot_est VARCHAR(255)                  -- Ruta de la foto
);





CREATE TABLE profesor (
  id_pro INT PRIMARY KEY AUTO_INCREMENT,
  nom_pro VARCHAR(100) NOT NULL,         -- Nombre del profesor
  ape_pro VARCHAR(100) NOT NULL,         -- Apellido del profesor
  ema_pro VARCHAR(100),                  -- Correo electrónico
  tel_pro VARCHAR(20),                   -- Teléfono
  esp_pro VARCHAR(150),                  -- Especialización
  fot_pro VARCHAR(255),                  -- Ruta de la foto
  tdo_apr VARCHAR(50),                   -- Tipo de documento
  ndo_apr VARCHAR(25)                    -- Número de documento
);


CREATE TABLE cadi (
  id_cadi INT PRIMARY KEY AUTO_INCREMENT,
  nom_cadi VARCHAR(100) NOT NULL,         -- Nombre del CADI o área
  resp_cadi VARCHAR(100),                 -- Responsable del CADI
  correo_cadi VARCHAR(100),               -- Correo de contacto
  ubicacion_cadi VARCHAR(100)             -- Ubicación física o extensión
);


CREATE TABLE asignatura (
  id_asig INT PRIMARY KEY AUTO_INCREMENT,
  nom_asig VARCHAR(100) NOT NULL,         -- Nombre de la asignatura
  cod_asig VARCHAR(50) UNIQUE NOT NULL,   -- Código único de la asignatura
  semestre INT NOT NULL,                  -- Semestre en el que se dicta
  id_profesor INT,                        -- Clave foránea al profesor (opcional)
  FOREIGN KEY (id_profesor) REFERENCES profesor(id_pro)
);


CREATE TABLE matricula (
  id_mat INT AUTO_INCREMENT PRIMARY KEY,
  id_apr INT NOT NULL,
  id_asi INT NOT NULL,
  fec_mat DATE NOT NULL,       
  est_mat VARCHAR(50) NOT NULL, 
  FOREIGN KEY (id_apr) REFERENCES estudiante(id_apr),
  FOREIGN KEY (id_asi) REFERENCES asignatura(id_asi)
);
