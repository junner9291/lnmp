# .bashrc

# Source global definitions
if [ -f /etc/bashrc ]; then
	. /etc/bashrc
fi

export PS1='\[\e[1;37m\] \[\e[1;32m\]\u\[\e[0;39m\]@\[\e[1;36m\]\h\[\e[0;39m\]:\[\e[1;33m\]\w\[\e[0;39m\]\[\e[1;35m\]\[\e[0;39m\] \[\e[1;37m\]\[\e[0;39m\]\n$'

alias ls='ls --color=auto'
alias grep="grep --color"
alias ls="ls --color"
alias coco='cd /data/www'

set bell-style none

#source /root/z.sh

#alias rm='rm -if'
#alias cp='cp -i'
#alias mv='mv -i'

# User specific aliases and functions
