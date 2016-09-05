for D in `find . -type d -name "_dev" `
do
  if [ ! -e $1 ]; then
    echo  "Order allow,deny" >> $D/.htaccess
    echo  "Deny from all" >> $D/.htaccess
  fi
done

for D in `find . -type d -name ".git" `
do
  if [ ! -e $1 ]; then
    echo  "Order allow,deny" >> $D/.htaccess
    echo  "Deny from all" >> $D/.htaccess
  fi
done


for D in `find . -type d -name "_help" `
do
  if [ ! -e $1 ]; then
    echo  "Order allow,deny" >> $D/.htaccess
    echo  "Deny from all" >> $D/.htaccess
  fi
done


for D in `find . -type d -name ".svn" `
do
  if [ ! -e $1 ]; then
    echo  "Order allow,deny" >> $D/.htaccess
    echo  "Deny from all" >> $D/.htaccess
  fi
done
